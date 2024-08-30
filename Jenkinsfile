pipeline {
  agent any
  
  stages {
    stage('Build') {
      steps {
          git branch: 'main', credentialsId: '76edd560-fdbd-4ac2-899d-bf92011abbe4', url: 'https://github.com/MrHTD/mywebsite.git'
      }
    }
    stage('Deploy') {
      steps {
          sshPublisher(publishers: [sshPublisherDesc(configName: 'lamp', transfers: [sshTransfer(cleanRemote: false, excludes: '', execCommand: 'cd /var/www/lamp', execTimeout: 120000, flatten: false, makeEmptyDirs: false, noDefaultExcludes: false, patternSeparator: '[, ]+', remoteDirectory: '', remoteDirectorySDF: false, removePrefix: '', sourceFiles: '')], usePromotionTimestamp: false, useWorkspaceInPromotion: false, verbose: false)])
      }
    }
  }
}
