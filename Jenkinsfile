pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'   // Jenkins credential ID Docker Hub
        KUBECONFIG = '/var/jenkins_home/.kube/config/config'   // kubeconfig path di container Jenkins
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

                        // Install ingress-nginx controller jika belum ada
                        sh '''
                        if ! kubectl get pods -n ingress-nginx > /dev/null 2>&1; then
                          echo "Ingress-nginx not found, installing..."
                          kubectl apply -f https://raw.githubusercontent.com/kubernetes/ingress-nginx/controller-v1.9.0/deploy/static/provider/cloud/deploy.yaml
                          echo "Waiting for ingress-nginx controller to be ready..."
                          kubectl wait --namespace ingress-nginx \
                            --for=condition=ready pod \
                            --selector=app.kubernetes.io/component=controller \
                            --timeout=120s
                        else
                          echo "Ingress-nginx controller already installed"
                        fi
                        '''

                        sh 'kubectl apply -f laravel-deployment.yaml --validate=false'
                        sh 'kubectl apply -f laravel-ingress.yaml --validate=false'

                        sh 'kubectl get pods -n default'
                        sh 'kubectl get svc -n default'
                        sh 'kubectl get pods -n ingress-nginx'
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
            echo "Deployment successful! Akses aplikasi lewat domain yang sudah di-set di Ingress."
        }

        failure {
            echo "Deployment failed. Cek log di atas untuk detail."
        }
    }
}
