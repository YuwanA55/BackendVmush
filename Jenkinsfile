pipeline {
    agent any

    environment {
        REGISTRY = "rzaynuri/laravel-vmush"
        IMAGE_TAG = "${env.BUILD_NUMBER}"
        GITHUB_REPO = "https://github.com/YuwanA55/BackendVmush.git"
        KUBE_NAMESPACE = "default" // sesuaikan namespace k8s Anda
        DEPLOYMENT_NAME = "laravel-app"
        NODEPORT_SERVICE_NAME = "laravel-service"
        DOCKER_CREDENTIALS_ID = "dockerhub-credentials"
        GIT_CREDENTIALS_ID = "github-credentials"
    }

    stages {
        stage('Checkout') {
            steps {
                git url: env.GITHUB_REPO, credentialsId: env.GIT_CREDENTIALS_ID
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build("${REGISTRY}:${IMAGE_TAG}")
                }
            }
        }

        stage('Push Image to Docker Hub') {
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', env.DOCKER_CREDENTIALS_ID) {
                        docker.image("${REGISTRY}:${IMAGE_TAG}").push()
                        // Optional tag latest
                        docker.image("${REGISTRY}:${IMAGE_TAG}").push("latest")
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Update image in deployment
                    sh """
                    kubectl set image deployment/${DEPLOYMENT_NAME} app=${REGISTRY}:${IMAGE_TAG} -n ${KUBE_NAMESPACE}
                    """

                    // Jika deployment belum ada, buat deployment dan service dari template YAML (opsional)
                    // atau gunakan apply jika sudah ada manifest yaml di repo
                }
            }
        }
    }

    post {
        success {
            echo "Deploy berhasil untuk image tag ${IMAGE_TAG}"
        }
        failure {
            echo "Deploy gagal"
        }
    }
}
