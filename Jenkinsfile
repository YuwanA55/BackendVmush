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
                    # Buat Docker network jika belum ada
                    docker network create laravel-network || true

                    # Hentikan dan hapus container lama jika ada
                    docker rm -f laravel-app-nginx || true
                    docker rm -f laravel-app-php || true

                    # Jalankan container PHP-FPM (app)
                    docker run -d --name laravel-app-php --network laravel-network ${IMAGE_NAME}

                    # Periksa apakah direktori public ada, jika tidak salin dari container
                    if [ ! -d "public" ]; then
                        docker cp laravel-app-php:/var/www/html/public ./public
                    fi

                    # Periksa keberadaan direktori public
                    ls -ld public || echo "Public directory not found!"

                    # Simpan nginx.conf ke workspace sementara
                    cat > nginx.conf <<EOF
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
                    ls -l nginx.conf || echo "Failed to create nginx.conf"
                    cat nginx.conf

                    # Validasi konfigurasi Nginx
                    docker run --rm -v $(pwd)/nginx.conf:/etc/nginx/conf.d/default.conf:ro nginx:latest nginx -t

                    # Jalankan container Nginx
                    docker run -d --name laravel-app-nginx \
                        --network laravel-network \
                        -p 80:80 \
                        -v $(pwd)/public:/var/www/html/public \
                        -v $(pwd)/nginx.conf:/etc/nginx/conf.d/default.conf:ro \
                        nginx:latest

                    # Periksa status container
                    docker ps -a

                    # Periksa log container untuk debugging
                    docker logs laravel-app-php
                    docker logs laravel-app-nginx
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
