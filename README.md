
### Setting Up a Laravel Development Environment with Docker Compose

---

### **Overview**

This guide explains how to set up a local development environment using Docker Compose. The process uses environment variables stored in a custom `.env` file to configure the application.

---

### **Prerequisites**

Before you begin, ensure you have the following installed on your system:

1. [Docker](https://docs.docker.com/get-docker/)
2. [Docker Compose](https://docs.docker.com/compose/install/)

---

### **Steps to Set Up the Development Environment**

1. **Clone the Repository**  
    Clone the project repository to your local machine:
    
    ```bash
    git clone <repository-url>
    cd <repository-directory>
    ```
    
2. **Create an Environment Variables File**  
    In the `src` directory, create a file named `development.env`. This file will store the environment variables needed to run the application.
    
    Example:
    
    ```bash
    # src/development.env
    APP_ENV=development
    DATABASE_URL=postgres://user:password@db:5432/mydatabase
    SECRET_KEY=your-secret-key
    DEBUG=True
    ```
    
    > **Note:** Replace the values with your desired configuration.
    
3. **Run Docker Compose with the Custom Environment File**  
    Use the following command to build and start the development environment:
    
    ```bash
    docker compose -f docker-compose.dev.yml --env-file src/development.env up -d --build

    ```
    - `-f docker-compose.dev.yml`: Tells Docker Compose to use the development-specific configuration file.
    - `--env-file`: Specifies the custom environment file.
    - `-d`: Runs the containers in detached mode.
    - `--build`: Ensures the containers are rebuilt with the latest changes.
4. **Verify the Setup**  
    Check that the containers are running:
    
    ```bash
    docker ps
    ```
    
    You should see the list of running containers.
    
5. **Access the Application**  
    Depending on your application setup:
    
    - Visit the application in your browser at `http://localhost:<port>` (replace `<port>` with the port specified in your environment file).
    - Use logs to debug if needed:
        
        ```bash
        docker compose logs -f
        ```
        

---

### **Stopping the Development Environment**

To stop the running containers, use:

```bash
docker compose down
```

This will stop and remove all containers, networks, and volumes created by Docker Compose.

---

### **Common Troubleshooting**

1. **Environment Variables Not Found:**  
    Ensure the `development.env` file is correctly placed in the `src` directory and has the proper name.
    
2. **Build Errors:**  
    If you encounter issues while building the containers, clean up unused resources and retry:
    
    ```bash
    docker system prune -f
    docker compose --env-file src/development.env up -d --build
    ```
    
3. **Network Issues:**  
    Restart the Docker daemon or check your Docker Compose file for misconfigured services.
    

---

### **Additional Commands**

- **Rebuild and Restart Containers:**
    
    ```bash
    docker compose --env-file src/development.env up -d --build
    ```
    
- **View Logs for a Specific Service:**
    
    ```bash
    docker compose logs <service-name>
    ```
    
- **Run a Command in a Container:**
    
    ```bash
    docker compose run --rm <container-name> <specific-command>
    ```
    

---

### **Feedback and Contribution**

If you encounter any issues or have suggestions for improvements, feel free to open an issue or submit a pull request.

---

Enjoy coding! 🚀
