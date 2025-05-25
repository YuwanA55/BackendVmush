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

        stage('Deploy with Docker Compose') {
            steps {
                script {
                    sh '''
                    # Cek apakah docker-compose legacy tersedia
                    if command -v docker-compose > /dev/null 2>&1; then
                        echo "docker-compose (legacy) found"
                        DC="docker-compose"
                    # Jika tidak ada, cek apakah docker compose (v2) tersedia
                    elif docker compose version > /dev/null 2>&1; then
                        echo "docker compose (v2) found"
                        DC="docker compose"
                    else
                        echo "docker-compose not found, installing legacy docker-compose"
                        sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
                        sudo chmod +x /usr/local/bin/docker-compose
                        DC="docker-compose"
                    fi

                    # Tampilkan versi docker compose yang digunakan
                    $DC version

                    # Deploy
                    $DC down || true
                    $DC up -d --build
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
