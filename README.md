## Typo3 Docker Installation

1. Install Docker Container  
   ```
   git clone git@github.com:warmiak/docker-php71.git
   ```
   
2. Setup Typo3  
   ```
   ./pre-install.sh
   ```
   
3. Start Docker Container  
   ```
   docker-compose up -d --build
   ```
   
4. Post-Install Steps  
   ```
   ./post-install.sh
   ```
