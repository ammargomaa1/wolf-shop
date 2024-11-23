# Wolf Shop

Wolf Shop is a Laravel-based application designed to manage inventory updates efficiently.

## Prerequisites

Before setting up the project, ensure you have the following installed on your machine:

-   [Docker](https://www.docker.com/products/docker-desktop/)
-   [Docker Compose](https://docs.docker.com/compose/install/)
-   [Git](https://git-scm.com/)

## Setup Instructions

Follow these steps to set up and run the project:

1. **Clone the Repository**

    Open your terminal and execute:

    ```bash
    git clone https://github.com/ammargomaa1/wolf-shop.git
    cd wolf-shop

    ```

2. Set Up Environment Variables
   Copy the example environment file and configure your credentials:
    ```bash
    cp .env.example .env
    ```

    Edit the .env file to include your Cloudinary credentials:

    ```
    CLOUDINARY_API_KEY=your_api_key=
    CLOUDINARY_SECRET_KEY=your_secret_key
    CLOUDINARY_CLOUD_NAME=your_cloud_name
    ```

3. Build and Start Docker Containers

    ```bash
    docker-compose up --build
    ```

4. Generate Application Key

    ```bash
    docker-compose exec app php artisan key:generate
    ```


## Postman Collection

The project includes a Postman collection for API testing. You can find it in the base directory of the repository.