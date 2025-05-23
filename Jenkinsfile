pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials' // Pastikan ID ini sesuai dengan kredensial yang ada di Jenkins
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
                    // Build Docker image dari Dockerfile
                    docker.build(DOCKER_IMAGE)
                }
            }
        }

        stage('Push Docker Image to Docker Hub') {
            steps {
                script {
                    // Menggunakan kredensial Docker Hub untuk login dan push image
                    withCredentials([usernamePassword(credentialsId: DOCKER_CREDENTIALS, usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                        // Login ke Docker Hub
                        sh 'docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD'
                        // Push Docker image ke Docker Hub
                        sh "docker push ${DOCKER_IMAGE}"
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Apply Kubernetes deployment file (misalnya: laravel-deployment.yaml)
                    sh 'kubectl apply -f laravel-deployment.yaml'
                }
            }
        }
    }
}
