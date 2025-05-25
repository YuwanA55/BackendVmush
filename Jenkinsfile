pipeline {
    agent any

    environment {
        GIT_REPO = 'https://github.com/username/repo.git'  // ganti sesuai repo
        APP_NAME = 'laravel-app'
        IMAGE_NAME = "dockerhubusername/${APP_NAME}:latest"
        DOCKERHUB_CREDENTIALS = 'dockerhub-credentials-id' // ganti sesuai credential ID Jenkins kamu
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
                    // Cek apakah 'docker-compose' ada, jika tidak coba 'docker compose', kalau tidak ada install manual tanpa sudo
                    sh '''
                    if command -v docker-compose >/dev/null 2>&1; then
                        echo "docker-compose found"
                        DOCKER_COMPOSE_CMD="docker-compose"
                    elif docker compose version >/dev/null 2>&1; then
                        echo "docker compose found"
                        DOCKER_COMPOSE_CMD="docker compose"
                    else
                        echo "docker-compose not found, installing legacy docker-compose"
                        curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
                        chmod +x /usr/local/bin/docker-compose
                        DOCKER_COMPOSE_CMD="docker-compose"
                    fi

                    $DOCKER_COMPOSE_CMD down
                    $DOCKER_COMPOSE_CMD up -d --build
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
