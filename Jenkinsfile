pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'  // Jenkins credential ID Docker Hub
        KUBECONFIG = '/home/jenkins/.kube/config'      // Path kubeconfig di Jenkins container, sesuaikan
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
                    echo "Download MetalLB manifest dari repo resmi"
                    mkdir -p metallb
                    curl -sL -o metallb/metallb-manifest.yaml https://raw.githubusercontent.com/metallb/metallb/v0.13.10/config/manifests/metallb-native.yaml

                    echo "List file di metallb folder untuk verifikasi:"
                    ls -l metallb/

                    echo "Install MetalLB CRDs & controller"
                    kubectl apply -f metallb/metallb-manifest.yaml

                    echo "Tunggu MetalLB controller dan speaker siap..."
                    kubectl -n metallb-system wait --for=condition=available deployment/controller --timeout=120s
                    kubectl -n metallb-system wait --for=condition=ready pod -l component=speaker --timeout=120s

                    echo "Apply MetalLB IP Address Pool dan L2 Advertisement"
                    kubectl apply -f metallb/metallb-config.yaml
                    '''
                }
            }
        }

        stage('Deploy Laravel + Ingress') {
            steps {
                script {
                    sh '''
                    echo "Apply Laravel deployment + service & ingress"
                    kubectl apply -f laravel-deployment.yaml --validate=false
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
            echo "Pipeline finished."
        }

        success {
            echo "Deployment successful! Akses aplikasi lewat domain dan IP dari MetalLB."
        }

        failure {
            echo "Deployment failed. Cek log di atas untuk detail."
        }
    }
}
