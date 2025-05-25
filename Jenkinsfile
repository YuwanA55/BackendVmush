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
                git branch: 'main', url: 'https://github.com/YuwanA55/BackendVmush.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t ${DOCKER_REPO}:latest .'
            }
        }

        stage('Login to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-credentials', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    sh "docker login -u ${DOCKER_USERNAME} -p ${DOCKER_PASSWORD}"
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                sh 'docker push ${DOCKER_REPO}:latest'
            }
        }

        stage('Deploy From Docker Hub') {
            steps {
                script {
                    // Stop container lama dan pull ulang dari Docker Hub lalu jalankan
                    sh """
                        docker rm -f ${CONTAINER_NAME} || true
                        docker pull ${DOCKER_REPO}:latest
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
