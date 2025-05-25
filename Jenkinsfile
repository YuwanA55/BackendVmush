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
                    docker rm -f laravel-app-traefik || true
                    docker rm -f laravel-app-php || true

                    # Jalankan container PHP-FPM (app) dengan label untuk Traefik
                    echo "Running PHP-FPM container..."
                    docker run -d --name laravel-app-php \
                        --network laravel-network \
                        -l traefik.enable=true \
                        -l traefik.http.routers.laravel.rule=PathPrefix\\(`/`\\) \
                        -l traefik.http.services.laravel.loadbalancer.server.port=9000 \
                        -l traefik.http.routers.laravel.entrypoints=web \
                        ${IMAGE_NAME} php-fpm -F

                    # Periksa apakah PHP-FPM berjalan di port 9000
                    echo "Checking PHP-FPM port..."
                    sleep 2
                    docker exec laravel-app-php netstat -tuln | grep 9000 || { echo "PHP-FPM not running on port 9000!"; docker logs laravel-app-php; docker exec laravel-app-php ps aux; exit 1; }

                    # Periksa apakah direktori public ada, jika tidak salin dari container
                    echo "Checking public directory..."
                    if [ ! -d "public" ]; then
                        echo "Copying public directory from PHP container..."
                        docker cp laravel-app-php:/var/www/html/public ./public
                    fi

                    # Periksa keberadaan direktori public dan index.php
                    ls -ld public || { echo "Public directory not found!"; exit 1; }
                    ls -l public/index.php || { echo "index.php not found in public directory!"; docker exec laravel-app-php ls -l /var/www/html/public; exit 1; }

                    # Jalankan container Traefik sebagai reverse proxy
                    echo "Running Traefik container..."
                    docker run -d --name laravel-app-traefik \
                        --network laravel-network \
                        -p 80:80 \
                        -p 8080:8080 \
                        -v /var/run/docker.sock:/var/run/docker.sock:ro \
                        traefik:v2.10 \
                        --api.insecure=true \
                        --providers.docker=true \
                        --providers.docker.exposedbydefault=false \
                        --entrypoints.web.address=:80

                    # Tunggu beberapa detik agar Traefik menginisialisasi
                    echo "Waiting for Traefik to initialize..."
                    sleep 5

                    # Periksa status container
                    echo "Checking container status..."
                    docker ps -a

                    # Periksa log container untuk debugging
                    echo "Checking container logs..."
                    docker logs laravel-app-php
                    docker logs laravel-app-traefik

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
