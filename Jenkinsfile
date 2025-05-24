pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'  // Jenkins credential ID untuk Docker Hub
        KUBECONFIG = '/home/jenkins/.kube/config'      // Pastikan file kubeconfig ada di path ini di container Jenkins
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

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Set environment variable untuk kubeconfig
                    withEnv(["KUBECONFIG=${env.KUBECONFIG}"]) {
                        // Cek apakah file deployment yaml ada di workspace
                        sh 'ls -l laravel-deployment.yaml'

                        // Terapkan file deployment ke cluster Kubernetes
                        sh "kubectl apply -f laravel-deployment.yaml"
                    }
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline finished."
        }

        success {
            echo "Deployment successful! Akses aplikasi kamu di IP/Domain Kubernetes."
        }

        failure {
            echo "Deployment failed. Cek log di atas untuk detail."
        }
    }
}
