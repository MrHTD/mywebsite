pipeline {
  agent any
  
  stages {
    stage('Version') {
      steps {
        sh 'php --version'
      }
    }
    stage('Deploy') {
      steps {
        sh 'php index.php'
    }
}
}
