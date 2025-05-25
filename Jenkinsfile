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

                    # Jalankan container Laravel dengan PHP Artisan serve
                    echo "Running Laravel container with php artisan serve..."
                    docker run -d --name laravel-app \
                        --network laravel-network \
                        -p 8081:8081 \
                        ${IMAGE_NAME} \
                        php artisan serve --host=0.0.0.0 --port=8081

                    # Tunggu beberapa detik agar PHP-FPM dan Laravel Artisan server menginisialisasi
                    echo "Waiting for Laravel to initialize..."
                    sleep 10

                    # Periksa apakah server Laravel berjalan pada port 8081
                    echo "Checking Laravel server status..."
                    curl -f http://localhost:8081 || { echo "Laravel server is not running!"; exit 1; }

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
