pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'username/laravel-app'
        DOCKER_CREDENTIALS = 'docker-hub-credentials'  // Jenkins credentials ID
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/username/laravel-repo.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build(DOCKER_IMAGE)
                }
            }
        }

        stage('Push Docker Image to Docker Hub') {
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', DOCKER_CREDENTIALS) {
                        docker.image(DOCKER_IMAGE).push()
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    sh 'kubectl apply -f laravel-deployment.yaml'
                }
            }
        }
    }
}
