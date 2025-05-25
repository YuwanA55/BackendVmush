pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-vmush:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'  // Credential ID Jenkins
    }

    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/YuwanA55/BackendVmush.git'
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

        stage('Generate docker-compose.yml') {
            steps {
                script {
                    writeFile file: 'docker-compose.yml', text: """
version: "3.8"

services:
  laravel:
    image: ${DOCKER_IMAGE}
    ports:
      - "80:80"
    deploy:
      replicas: 1
      restart_policy:
        condition: on-failure
    networks:
      - laravel_net

networks:
  laravel_net:
    driver: overlay
"""
                }
            }
        }

        stage('Deploy to Docker Swarm') {
            steps {
                script {
                    // Pastikan Jenkins node ini bisa akses Docker daemon server Swarm
                    sh """
                    docker stack rm laravel_stack || true
                    sleep 5
                    docker stack deploy -c docker-compose.yml laravel_stack
                    """
                }
            }
        }

        stage('Check Docker Swarm Status') {
            steps {
                script {
                    sh """
                    echo "Service List:"
                    docker service ls

                    echo "Service Tasks:"
                    docker service ps laravel_stack_laravel

                    echo "Running Containers:"
                    docker ps
                    """
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline selesai."
        }
        success {
            echo "✅ Deployment ke Docker Swarm berhasil! Akses aplikasi di port 80."
        }
        failure {
            echo "❌ Deployment gagal, cek log di atas."
        }
    }
}
