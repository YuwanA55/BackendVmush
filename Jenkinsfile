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
                    docker rm -f laravel-app || true

                    # Jalankan container Laravel dengan PHP-FPM
                    echo "Running Laravel container..."
                    docker run -d --name laravel-app \
                        --network laravel-network \
                        -p 9000:9000 \
                        ${IMAGE_NAME}

                    # Tunggu beberapa detik agar PHP-FPM menginisialisasi
                    echo "Waiting for PHP-FPM to initialize..."
                    sleep 10

                    # Periksa apakah PHP-FPM berjalan
                    echo "Checking PHP-FPM process..."
                    docker exec laravel-app pidof php-fpm || { echo "PHP-FPM process not running!"; docker logs laravel-app; exit 1; }

                    # Periksa isi entrypoint.sh
                    echo "Checking entrypoint.sh..."
                    docker exec laravel-app cat /usr/local/bin/entrypoint.sh || { echo "Failed to read entrypoint.sh!"; exit 1; }

                    # Periksa konfigurasi PHP-FPM
                    echo "Checking PHP-FPM configuration..."
                    docker exec laravel-app sh -c "cat /usr/local/etc/php-fpm.d/www.conf || cat /etc/php-fpm.d/www.conf" || { echo "Failed to read PHP-FPM config!"; docker logs laravel-app; exit 1; }

                    # Periksa port 9000 (jika netstat tersedia)
                    echo "Checking PHP-FPM port..."
                    docker exec laravel-app sh -c "netstat -tuln 2>/dev/null | grep 9000 || echo 'netstat not available or port 9000 not open'" || true

                    # Periksa keberadaan direktori public dan index.php
                    echo "Checking public directory..."
                    if [ ! -d "public" ]; then
                        echo "Copying public directory from container..."
                        docker cp laravel-app:/var/www/html/public ./public
                    fi
                    ls -ld public || { echo "Public directory not found!"; exit 1; }
                    ls -l public/index.php || { echo "index.php not found in public directory!"; docker exec laravel-app ls -l /var/www/html/public; exit 1; }

                    # Periksa status container
                    echo "Checking container status..."
                    docker ps -a

                    # Periksa log container untuk debugging
                    echo "Checking container logs..."
                    docker logs laravel-app
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
