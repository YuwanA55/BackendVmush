pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'
        STACK_NAME = 'laravel_stack'
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

        stage('Deploy to Docker Swarm') {
            steps {
                script {
                    sh """
                    echo 'Buat docker-compose.yml secara dinamis menggunakan image ${DOCKER_IMAGE}'

                    cat <<EOF > docker-compose.yml
version: '3.8'

services:
  laravel:
    image: ${DOCKER_IMAGE}
    deploy:
      replicas: 1
      restart_policy:
        condition: on-failure
    ports:
      - "8080:80"
    environment:
      APP_ENV: production
      APP_KEY: your-app-key
      DB_HOST: your-db-host
      DB_DATABASE: your-db-name
      DB_USERNAME: your-db-user
      DB_PASSWORD: your-db-pass
    networks:
      - laravel-net

networks:
  laravel-net:
    driver: overlay
EOF

                    echo 'Deploy Laravel stack ke Docker Swarm'
                    docker stack deploy -c docker-compose.yml ${STACK_NAME}
                    """
                }
            }
        }

        stage('Check Docker Swarm Services') {
            steps {
                script {
                    sh '''
                    echo "Cek service dan container status:"
                    docker service ls
                    docker stack services ${STACK_NAME}
                    docker ps
                    '''
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline finished."
        }

        success {
            echo "✅ Deployment ke Docker Swarm berhasil! Akses aplikasi di port 8080 host Swarm node."
        }

        failure {
            echo "❌ Deployment gagal. Silakan cek log dan konfigurasi Docker Swarm Anda."
        }
    }
}
