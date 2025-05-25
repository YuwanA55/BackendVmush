pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'laravel-vmush'
        DOCKER_REGISTRY = 'https://registry.hub.docker.com'
        DOCKER_REPO = 'rzaynuri/laravel-vmush'
        DOCKER_COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Checkout Code') {
            steps {
                // Checkout kode dari GitHub
                git branch: 'main', url: 'https://github.com/YuwanA55/BackendVmush.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    // Build Docker image
                    sh 'docker build -t ${DOCKER_REPO}:latest .'
                }
            }
        }

        stage('Login to Docker Hub') {
            steps {
                // Login ke Docker Hub menggunakan Docker Hub credential
                withCredentials([usernamePassword(credentialsId: 'dockerhub-credential', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    sh "docker login -u ${DOCKER_USERNAME} -p ${DOCKER_PASSWORD}"
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                // Push Docker image ke Docker Hub
                script {
                    sh "docker push ${DOCKER_REPO}:latest"
                }
            }
        }

        stage('Deploy to Docker Swarm') {
            steps {
                // Deploy ke Docker Swarm menggunakan Docker Compose
                script {
                    sh """
                    docker stack deploy -c ${DOCKER_COMPOSE_FILE} laravel_stack
                    """
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline berhasil dijalankan!'
        }
        failure {
            echo 'Pipeline gagal!'
        }
    }
}
