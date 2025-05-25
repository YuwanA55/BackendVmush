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

        stage('Deploy Laravel + Ingress') {
            steps {
                script {
                    sh """
                    echo 'Generate laravel-deployment.yaml secara dinamis dengan tag image: ${DOCKER_IMAGE}'

                    cat <<EOF > laravel-deployment.yaml
apiVersion: apps/v1
kind: Deployment
metadata:
  name: laravel-app
spec:
  replicas: 1
  selector:
    matchLabels:
      app: laravel-app
  template:
    metadata:
      labels:
        app: laravel-app
    spec:
      containers:
      - name: laravel-app
        image: ${DOCKER_IMAGE}
        ports:
        - containerPort: 80
        envFrom:
        - configMapRef:
            name: laravel-configmap
        - secretRef:
            name: laravel-secret
        command: ["/bin/sh", "-c"]
        args:
          - |
            php-fpm;
---
apiVersion: v1
kind: Service
metadata:
  name: laravel-service
spec:
  type: NodePort
  selector:
    app: laravel-app
  ports:
    - port: 80
      targetPort: 80
      nodePort: 30080
EOF

                    echo 'Apply deployment dan service ke cluster'
                    kubectl apply -f laravel-deployment.yaml --validate=false

                    echo 'Apply ingress resource'
                    kubectl apply -f laravel-ingress.yaml --validate=false
                    """
                }
            }
        }

        stage('Check Kubernetes Resources') {
            steps {
                script {
                    sh '''
                    echo "Cek pod, service, dan ingress status:"
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
            echo "✅ Deployment successful! Akses aplikasi lewat domain dan reverse proxy ke NodePort."
        }

        failure {
            echo "❌ Deployment failed. Cek log di atas untuk detail kesalahan."
        }
    }
}
