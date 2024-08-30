pipeline {
  agent any
  
  stages {
    stage('Checkout') {
      steps {
          git branch: 'main', credentialsId: '76edd560-fdbd-4ac2-899d-bf92011abbe4', url: 'https://github.com/MrHTD/mywebsite.git'
      }
    }
    stage('Deploy') {
            steps {
                // Transfer files to the remote server
                sshPublisher(publishers: [sshPublisherDesc(
                    configName: 'lamp', // Your SSH configuration name
                    transfers: [sshTransfer(
                        cleanRemote: false,
                        excludes: '', // Exclude files from transfer if needed
                        execCommand: 'cd /var/www/lamp && git pull', // Change directory and pull latest changes
                        execTimeout: 120000, // Timeout for SSH command execution
                        flatten: false,
                        makeEmptyDirs: false,
                        noDefaultExcludes: false,
                        patternSeparator: '[, ]+',
                        remoteDirectory: '', // Directory on the remote server where files will be placed
                        remoteDirectorySDF: false,
                        removePrefix: '', // Remove this prefix from files' paths
                        sourceFiles: '**/*' // Source files from the Jenkins workspace
                    )],
                    usePromotionTimestamp: false,
                    useWorkspaceInPromotion: false,
                    verbose: true // Enable verbose logging for debugging
                )])
            }
    }
  }
}
