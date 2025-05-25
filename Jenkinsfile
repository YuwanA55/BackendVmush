pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-vmush:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'dockerhub-credentials'  // Credential ID Jenkins
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
version: '3.8'

services:
  app:
    image: ${DOCKER_IMAGE}  # Use the pre-built image from Docker Hub
    container_name: laravel-app
    volumes:
      - .:/var/www/html
    networks:
      - laravel_net
    working_dir: /var/www/html

  nginx:
    image: nginx:alpine
    container_name: nginx-web
    ports:
      - "80:80"
    volumes:
      - .:/var/www/html
      - ./nginx.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - app
    networks:
      - laravel_net

networks:
  laravel_net:
"""
                }
            }
        }

        stage('Create Docker Swarm Network') {
            steps {
                script {
                    sh '''
                    # Check if the network exists and create if not
                    docker network ls | grep -q laravel_net || docker network create --driver overlay laravel_net
                    '''
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

                    echo "Service Tasks for laravel_stack_app:"
                    docker service ps laravel_stack_app

                    echo "Service Tasks for laravel_stack_nginx:"
                    docker service ps laravel_stack_nginx

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
