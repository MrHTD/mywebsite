pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                // Clone your repository containing the Dockerfile and application code
                git 'https://github.com/MrHTD/mywebsite.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    // Build the Docker image using the Dockerfile
                    sh 'docker build -t lamp-stack-app:latest .'
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                script {
                    // Stop and remove any existing container
                    sh '''
                    docker stop lamp_container || true
                    docker rm lamp_container || true
                    '''

                    // Run the Docker container in detached mode
                    sh 'docker run -d --name lamp_container -p 80:80 lamp-stack-app:latest'
                }
            }
        }

        stage('Post-Deployment') {
            steps {
                echo 'Deployment completed successfully.'
            }
        }
    }

    post {
        always {
            // Cleanup: Remove unused Docker images and containers
            sh 'docker system prune -f'
        }
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed. Please check the logs.'
        }
    }
}
