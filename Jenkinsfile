pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'dockerhub-credentials'   // Jenkins credential ID Docker Hub
        KUBECONFIG = '/home/jenkins/.kube/config'       // kubeconfig path di container Jenkins
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
            withEnv(["KUBECONFIG=${env.KUBECONFIG}"]) {
                sh 'kubectl config view'
                sh 'kubectl config current-context'
                sh 'kubectl get nodes'

                sh 'ls -l laravel-deployment.yaml laravel-ingress.yaml'

                sh 'kubectl apply -f laravel-deployment.yaml --validate=false'
                sh 'kubectl apply -f laravel-ingress.yaml --validate=false'

                sh 'kubectl get pods'
                sh 'kubectl get svc'
            }
        }
    }
}


    post {
        always {
            echo "Pipeline finished."
        }

        success {
            echo "Deployment successful! Akses aplikasi lewat domain yang sudah di-set di Ingress."
        }

        failure {
            echo "Deployment failed. Cek log di atas untuk detail."
        }
    }
}
