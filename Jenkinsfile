pipeline {
    agent any

    environment {
        REGISTRY = "rzaynuri/laravel-vmush"
        IMAGE_TAG = "${env.BUILD_NUMBER}"
        GITHUB_REPO = "https://github.com/YuwanA55/BackendVmush.git"
        GIT_BRANCH = "main"
        KUBECONFIG = "/home/jenkins/.kube/config/config"
        KUBE_NAMESPACE = "default"
        DEPLOYMENT_NAME = "laravel-app"
        DOCKER_CREDENTIALS_ID = "dockerhub-credentials"
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: env.GIT_BRANCH, url: env.GITHUB_REPO
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build("${REGISTRY}:${IMAGE_TAG}")
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', env.DOCKER_CREDENTIALS_ID) {
                        docker.image("${REGISTRY}:${IMAGE_TAG}").push()
                        docker.image("${REGISTRY}:${IMAGE_TAG}").push("latest")
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                sh """
                export KUBECONFIG=${env.KUBECONFIG}
                kubectl set image deployment/${DEPLOYMENT_NAME} app=${REGISTRY}:${IMAGE_TAG} -n ${KUBE_NAMESPACE}
                kubectl rollout status deployment/${DEPLOYMENT_NAME} -n ${KUBE_NAMESPACE}
                """
            }
        }
    }

    post {
        success {
            echo "Pipeline sukses: Image ${REGISTRY}:${IMAGE_TAG} sudah deploy"
        }
        failure {
            echo "Pipeline gagal"
        }
    }
}
