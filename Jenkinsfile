pipeline {
    agent any

    environment {
        GIT_REPO = 'https://github.com/YuwanA55/BackendVmush.git'
        APP_NAME = 'laravel-vmush'
        IMAGE_NAME = "rzaynuri/${APP_NAME}:latest"
        DOCKERHUB_CREDENTIALS = 'dockerhub-credentials'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git url: "${GIT_REPO}", branch: 'main'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build(IMAGE_NAME, '.')
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', DOCKERHUB_CREDENTIALS) {
                        docker.image(IMAGE_NAME).push()
                    }
                }
            }
        }

        stage('Deploy with Docker Run') {
            steps {
                script {
                    sh '''
                    # Enable strict error handling
                    set -e

                    echo "Starting Deploy stage..."

                    # Buat Docker network jika belum ada
                    echo "Creating Docker network..."
                    docker network create laravel-network || true

                    # Hentikan dan hapus container lama jika ada
                    echo "Removing old containers..."
                    docker rm -f laravel-app-nginx || true
                    docker rm -f laravel-app-php || true

                    # Jalankan container PHP-FPM
                    echo "Running PHP-FPM container..."
                    docker run -d --name laravel-app-php \
                        --network laravel-network \
                        ${IMAGE_NAME} php-fpm -F

                    # Tunggu beberapa detik agar PHP-FPM menginisialisasi
                    echo "Waiting for PHP-FPM to initialize..."
                    sleep 5

                    # Periksa apakah PHP-FPM berjalan
                    echo "Checking PHP-FPM process..."
                    docker exec laravel-app-php pidof php-fpm || { echo "PHP-FPM process not running!"; docker logs laravel-app-php; exit 1; }

                    # Periksa konfigurasi PHP-FPM
                    echo "Checking PHP-FPM configuration..."
                    docker exec laravel-app-php sh -c "cat /usr/local/etc/php-fpm.d/www.conf || cat /etc/php-fpm.d/www.conf" || { echo "Failed to read PHP-FPM config!"; docker logs laravel-app-php; exit 1; }

                    # Periksa apakah direktori public ada, jika tidak salin dari container
                    echo "Checking public directory..."
                    if [ ! -d "public" ]; then
                        echo "Copying public directory from PHP container..."
                        docker cp laravel-app-php:/var/www/html/public ./public
                    fi

                    # Periksa keberadaan direktori public dan index.php
                    ls -ld public || { echo "Public directory not found!"; exit 1; }
                    ls -l public/index.php || { echo "index.php not found in public directory!"; docker exec laravel-app-php ls -l /var/www/html/public; exit 1; }

                    # Buat nginx.conf
                    echo "Creating nginx.conf..."
                    cat <<EOF > nginx.conf
server {
    listen 80;
    index index.php index.html;
    server_name vmush.site;

    root /var/www/html/public;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \\.php\$ {
        include fastcgi_params;
        fastcgi_pass laravel-app-php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT \$realpath_root;
    }

    location ~ /\\.ht {
        deny all;
    }
}
EOF

                    # Periksa keberadaan nginx.conf
                    ls -l nginx.conf || { echo "Failed to create nginx.conf"; exit 1; }

                    # Validasi nginx.conf
                    echo "Validating nginx.conf..."
                    docker run --rm -v $(pwd)/nginx.conf:/etc/nginx/conf.d/default.conf:ro nginx:latest nginx -t

                    # Jalankan container Nginx
                    echo "Running Nginx container..."
                    docker run -d --name laravel-app-nginx \
                        --network laravel-network \
                        -p 80:80 \
                        -v $(pwd)/public:/var/www/html/public:ro \
                        -v $(pwd)/nginx.conf:/etc/nginx/conf.d/default.conf:ro \
                        nginx:latest

                    # Periksa status container
                    echo "Checking container status..."
                    docker ps -a

                    # Periksa log container untuk debugging
                    echo "Checking container logs..."
                    docker logs laravel-app-php
                    docker logs laravel-app-nginx

                    # Uji akses ke aplikasi
                    echo "Testing application access..."
                    curl -v http://localhost || { echo "Failed to access application!"; exit 1; }
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline berhasil!'
        }
        failure {
            echo 'Pipeline gagal!'
        }
    }
}
