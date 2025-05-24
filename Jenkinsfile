pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'
        KUBECONFIG = '/var/jenkins_home/.kube/config/config'
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

        stage('Download MetalLB manifest') {
            steps {
                script {
                    sh '''
                    mkdir -p metallb
                    curl -sSL -o metallb/metallb-manifest.yaml https://raw.githubusercontent.com/metallb/metallb/v0.13.10/config/manifests/metallb-native.yaml
                    '''
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
