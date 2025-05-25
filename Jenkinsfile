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
                        DC="docker-compose"
                    # Jika tidak ada, cek apakah docker compose (v2) tersedia
                    elif command -v docker compose > /dev/null 2>&1; then
                        DC="docker compose"
                    else
                        echo "ERROR: docker-compose or docker compose command not found. Please install it in the Jenkins agent."
                        exit 1
                    fi

                    echo "Using $DC for deployment"

                    $DC version

                    # Deploy menggunakan docker-compose atau docker compose
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
