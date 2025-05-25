pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-vmush:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'dockerhub-credentials'   // Jenkins credential ID Docker Hub
        KUBECONFIG = '/home/jenkins/.kube/config'       // kubeconfig path di Jenkins agent
    }

    stages {
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
                    withEnv(["KUBECONFIG=${env.KUBECONFIG}"]) {
                        // Verifikasi kubeconfig
                        sh 'kubectl config view'

                        // Cek file deployment (pastikan file ada di workspace)
                        sh 'ls -l laravel-deployment.yaml'

                        // Terapkan deployment ke cluster
                        sh 'kubectl apply -f laravel-deployment.yaml'

                        // Verifikasi pod dan service di namespace default
                        sh 'kubectl get pods -n default'
                        sh 'kubectl get svc -n default'
                    }
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline selesai."
        }

        success {
            echo "Deployment berhasil!"
        }

        failure {
            echo "Deployment gagal. Cek log di atas untuk detail."
        }
    }
}
