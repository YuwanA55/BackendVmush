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
                    # Hentikan dan hapus container lama jika ada
                    docker rm -f laravel-app-nginx || true
                    docker rm -f laravel-app-php || true

                    # Jalankan container PHP-FPM (app)
                    docker run -d --name laravel-app-php ${IMAGE_NAME}

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

                    # Jalankan container Nginx, mount nginx.conf dan link ke PHP-FPM container
                    docker run -d --name laravel-app-nginx \
                        --link laravel-app-php:laravel-app-php \
                        -p 80:80 \
                        -v $(pwd)/public:/var/www/html/public \
                        -v $(pwd)/nginx.conf:/etc/nginx/conf.d/default.conf:ro \
                        nginx:latest
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
