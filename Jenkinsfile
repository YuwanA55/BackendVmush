pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'  // Jenkins credential ID Docker Hub
        KUBECONFIG = '/var/jenkins_home/.kube/config/config'  // Path di dalam Jenkins container
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
                    withEnv(["KUBECONFIG=${env.KUBECONFIG}"]) {
                        sh '''
                        echo "Install MetalLB CRDs & controller"
                        kubectl apply -f metallb/metallb-manifest.yaml

                        echo "Tunggu MetalLB controller dan speaker siap..."
                        kubectl -n metallb-system wait --for=condition=available deployment/controller --timeout=120s
                        kubectl -n metallb-system wait --for=condition=ready pod -l app=metallb-speaker --timeout=120s

                        echo "Apply MetalLB IP Address Pool dan L2 Advertisement"
                        kubectl apply -f metallb/metallb-config.yaml
                        '''
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    withEnv(["KUBECONFIG=${env.KUBECONFIG}"]) {
                        sh '''
                        echo "Apply Laravel deployment & ingress"
                        kubectl apply -f laravel-deployment.yaml --validate=false
                        kubectl apply -f laravel-ingress.yaml --validate=false
                        '''
                    }
                }
            }
        }

        stage('Check Resources') {
            steps {
                script {
                    withEnv(["KUBECONFIG=${env.KUBECONFIG}"]) {
                        sh '''
                        kubectl get pods -A
                        kubectl get svc -A
                        kubectl get ingress -A
                        '''
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
            echo "Deployment successful! Akses aplikasi lewat domain dan IP dari MetalLB."
        }

        failure {
            echo "Deployment failed. Cek log di atas untuk detail."
        }
    }
}
