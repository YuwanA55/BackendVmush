pipeline {
    agent any

    environment {
        GIT_REPO = 'https://github.com/username/repo.git'  // ganti dengan repo yang sesuai
        APP_NAME = 'laravel-app'
        IMAGE_NAME = "dockerhubusername/${APP_NAME}:latest"
        DOCKERHUB_CREDENTIALS = 'dockerhub-credentials-id' // ganti dengan credential ID Jenkins kamu
        NGINX_CONF_PATH = './nginx.conf' // Path file nginx.conf di repo
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

        stage('Deploy with Docker Run (Nginx + Laravel App)') {
            steps {
                script {
                    // Jalankan container Nginx dengan konfigurasi nginx.conf
                    sh '''
                    # Pull image Nginx jika belum ada
                    docker pull nginx:alpine

                    # Run the Nginx container and link it with the Laravel app container
                    docker run -d --name nginx-web \
                        -v $(pwd)/nginx.conf:/etc/nginx/conf.d/default.conf:ro \
                        -v $(pwd):/var/www/html \
                        -p 80:80 \
                        --link laravel-app:app \
                        nginx:alpine

                    # Menjalankan container Laravel app jika belum berjalan
                    docker run -d --name laravel-app \
                        --network=bridge \
                        -v $(pwd):/var/www/html \
                        ${IMAGE_NAME}
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline selesai dengan sukses!'
        }
        failure {
            echo 'Pipeline gagal, cek log di atas.'
        }
    }
}
