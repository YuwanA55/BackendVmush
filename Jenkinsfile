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

                    # Jalankan container PHP-FPM (app)
                    echo "Running PHP-FPM container..."
                    docker run -d --name laravel-app-php --network laravel-network ${IMAGE_NAME}

                    # Periksa apakah direktori public ada, jika tidak salin dari container
                    echo "Checking public directory..."
                    if [ ! -d "public" ]; then
                        echo "Copying public directory from PHP container..."
                        docker cp laravel-app-php:/var/www/html/public ./public
                    fi

                    # Periksa keberadaan direktori public
                    ls -ld public || { echo "Public directory not found!"; exit 1; }

                    # Simpan nginx.conf ke workspace sementara
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

                    # Periksa apakah nginx.conf dibuat
                    echo "Checking nginx.conf..."
                    if [ ! -f nginx.conf ]; then
                        echo "Failed to create nginx.conf"
                        exit 1
                    fi
                    ls -l nginx.conf
                    cat nginx.conf

                    # Validasi konfigurasi Nginx
                    echo "Validating nginx.conf..."
                    # Buat direktori sementara untuk mount
                    mkdir -p nginx_temp/conf.d
                    cp nginx.conf nginx_temp/conf.d/default.conf
                    docker run --rm -v $(pwd)/nginx_temp/conf.d/default.conf:/etc/nginx/conf.d/default.conf:ro nginx:latest nginx -t

                    # Jalankan container Nginx
                    echo "Running Nginx container..."
                    docker run -d --name laravel-app-nginx \
                        --network laravel-network \
                        -p 80:80 \
                        -v $(pwd)/public:/var/www/html/public \
                        -v $(pwd)/nginx_temp/conf.d/default.conf:/etc/nginx/conf.d/default.conf:ro \
                        nginx:latest

                    # Periksa status container
                    echo "Checking container status..."
                    docker ps -a

                    # Periksa log container untuk debugging
                    echo "Checking container logs..."
                    docker logs laravel-app-php
                    docker logs laravel-app-nginx

                    # Bersihkan direktori sementara
                    rm -rf nginx_temp
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
