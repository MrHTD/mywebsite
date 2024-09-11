pipeline {
  agent any
  stages {
    stage ('Run Docker Compose') {
      steps{
        sh 'sudo docker-compose up -d'
      }
    }
  }
}
