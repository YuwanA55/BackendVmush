pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "rzaynuri/laravel-app:${env.BUILD_NUMBER}"
        DOCKER_CREDENTIALS = 'docker-hub-credentials'  // Ganti dengan ID credentials di Jenkins
        KUBECONFIG = '/home/jenkins/.kube/config'      // Path ke kubeconfig di agent Jenkins
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
        image: rzaynuri/laravel-app:latest
        ports:
        - containerPort: 80
        envFrom:
        - configMapRef:
            name: laravel-configmap     # <-- harus ini, bukan laravel-env
        - secretRef:
            name: laravel-secret
        command: ["/bin/sh", "-c"]
        args:
          - |
            echo -n "base64:K7Uu3Q5EXAMPLEKEY123456==" | base64;
            echo -n "laravel" | base64;
            echo -n "secret" | base64;
            # ganti dengan command utama container, contoh:
            php-fpm;
---
apiVersion: v1
kind: Service
metadata:
  name: laravel-service
spec:
  type: LoadBalancer
  selector:
    app: laravel-app
  ports:
    - port: 80
      targetPort: 80
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
            echo "✅ Deployment successful! Akses aplikasi lewat domain dan IP dari MetalLB."
        }

        failure {
            echo "❌ Deployment failed. Cek log di atas untuk detail kesalahan."
        }
    }
}
