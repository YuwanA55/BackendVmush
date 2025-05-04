pipeline {
    agent any

    environment {
        DEPLOY_DIR = '/var/www/dev-laravel' // ubah sesuai lokasi deploy di server kamu
        BRANCH = 'development' // ubah sesuai cabang GitHub
    }

    stages {
        stage('Clone Code') {
            steps {
                git branch: "${BRANCH}", url: 'https://github.com/YuwanA55/BackendVmush.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }

        stage('Environment Setup') {
            steps {
                sh 'cp .env.example .env || true'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Migrations') {
            steps {
                sh 'php artisan migrate --force'
            }
        }

        stage('Deploy') {
            steps {
                sh "rsync -avz --delete ./ ${DEPLOY_DIR}"
            }
        }
    }
}