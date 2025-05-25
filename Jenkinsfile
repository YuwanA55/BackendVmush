pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'laravel-vmush'
        DOCKER_REPO = 'rzaynuri/laravel-vmush'
        CONTAINER_NAME = 'laravel_vmush_app'
        CONTAINER_PORT = '8000'
        HOST_PORT = '8000'
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
                // Login ke Docker Hub menggunakan credentials
                withCredentials([usernamePassword(credentialsId: 'dockerhub-credentials', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    sh "docker login -u ${DOCKER_USERNAME} -p ${DOCKER_PASSWORD}"
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                // Push image ke Docker Hub
                sh 'docker push ${DOCKER_REPO}:latest'
            }
        }

        stage('Run Docker Container') {
            steps {
                script {
                    // Hentikan container lama kalau ada, lalu jalankan yang baru
                    sh """
                        docker rm -f ${CONTAINER_NAME} || true
                        docker run -d --name ${CONTAINER_NAME} -p ${HOST_PORT}:${CONTAINER_PORT} ${DOCKER_REPO}:latest
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
