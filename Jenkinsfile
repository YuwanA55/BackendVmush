pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'
        KUBECONFIG = '/home/jenkins/.kube/config'
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

        stage('Deploy MetalLB') {
            steps {
                script {
                    sh '''
                    mkdir -p metallb
                    curl -sL -o metallb/metallb-manifest.yaml https://raw.githubusercontent.com/metallb/metallb/v0.13.10/config/manifests/metallb-native.yaml

                    kubectl apply -f metallb/metallb-manifest.yaml

                    kubectl -n metallb-system wait --for=condition=available deployment/controller --timeout=120s
                    kubectl -n metallb-system wait --for=condition=ready pod -l component=speaker --timeout=120s

                    kubectl apply -f metallb/metallb-config.yaml
                    '''
                }
            }
        }

        stage('Deploy Laravel + Ingress') {
            steps {
                script {
                    sh '''
                    kubectl apply -f laravel-deployment.yaml --validate=false
                    kubectl apply -f laravel-service.yaml --validate=false
                    kubectl apply -f laravel-ingress.yaml --validate=false
                    '''
                }
            }
        }

        stage('Check Kubernetes Resources') {
            steps {
                script {
                    sh '''
                    kubectl get pods -A
                    kubectl get svc -A
                    kubectl get ingress -A
                    '''
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline selesai."
        }
        success {
            echo "Deployment sukses! Pastikan domain vmush.site sudah diarahkan ke IP Ingress Controller."
        }
        failure {
            echo "Deployment gagal. Cek log di atas."
        }
    }
}
