pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'rzaynuri/laravel-app'
        DOCKER_TAG = 'latest'
        DEPLOY_STACK_NAME = 'laravel_stack'
        DOCKER_COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/YuwanA55/BackendVmush.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh """
                docker build -t $DOCKER_IMAGE:$DOCKER_TAG .
                """
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh """
                    echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
                    docker push $DOCKER_IMAGE:$DOCKER_TAG
                    """
                }
            }
        }

        stage('Deploy to Swarm') {
            steps {
                sh """
                docker stack deploy -c $DOCKER_COMPOSE_FILE $DEPLOY_STACK_NAME
                """
            }
        }
    }
}
