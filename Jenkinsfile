pipeline {
    agent any

    environment {
        // Ganti dengan username dan repo kamu
        GIT_REPO = 'https://github.com/YuwanA55/BackendVmush.git'
        APP_NAME = 'laravel-vmush'
        IMAGE_NAME = "rzaynuri/${APP_NAME}:latest"

        // Jenkins Credentials ID untuk Docker Hub login
        DOCKERHUB_CREDENTIALS = 'dockerhub-credentials'
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Clone repo ke workspace/laravel-app
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

        stage('Deploy with Docker Compose') {
            steps {
                script {
                    // Jalankan docker-compose di folder kerja (workspace)
                    sh """
                    docker-compose --version

                    # Jika tidak ada, install docker-compose
                    sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-\\\$(uname -s)-\\\$(uname -m)" -o /usr/local/bin/docker-compose
                    sudo chmod +x /usr/local/bin/docker-compose

                    docker-compose down
                    docker-compose up -d --build
                    """
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
