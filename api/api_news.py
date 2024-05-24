import subprocess
import importlib.metadata as metadata
import os
from dotenv import load_dotenv
load_dotenv()
# Read the requirements from requirements.txt
with open("requirements.txt", "r") as file:
    requirements = [line.strip() for line in file]

# Get the names of installed packages
installed_packages = [pkg.name for pkg in metadata.distributions()]

# Check if each requirement is installed
missing_requirements = [requirement for requirement in requirements if requirement not in installed_packages]

# If there are missing requirements, install them
if missing_requirements:
    print("Installing missing requirements...")
    subprocess.call(["pip", "install", *missing_requirements])
    print("Requirements installed successfully.")

from flask import Flask, jsonify # type: ignore
import mysql.connector
import time

app = Flask(__name__)

DB_HOST = os.getenv("DB_HOST")
DB_USER = os.getenv("DB_USER")
DB_PASSWORD = os.getenv("DB_PASSWORD")
DB_NAME = os.getenv("DB_NAME")
# Establish a connection to MySQL database
db_connection = mysql.connector.connect(
    host=DB_HOST,
    user=DB_USER,
    password=DB_PASSWORD,
    database=DB_NAME
)

# Create a cursor object to interact with the database
cursor = db_connection.cursor()
last_database_state = None

# Define a function to check for database changes
def check_database_changes():
    global last_database_state
    
    # Query the database to get its current state
    current_database_state = ...  # Write code to retrieve the current state of the database
    
    # Compare current state with the last known state
    if current_database_state != last_database_state:
        # If changes are detected, refresh data or notify clients
        refresh_data()  # Example function to refresh data
        
        # Update the last known state with the current state
        last_database_state = current_database_state

# Define a function to refresh data
def refresh_data():
    # Code to refresh data goes here
    pass

# Define a function to start the polling mechanism
def start_polling():
    while True:
        # Check for database changes
        check_database_changes()
        
        # Sleep for a specific interval before checking again
        time.sleep(60)  # Check every 60 seconds (adjust as needed)


@app.route('/articles', methods=['GET'])
def get_articles():
    try:
        # SQL query to select data from the database
        sql = "SELECT * FROM tb_beritas"
        # Execute the SQL query
        cursor.execute(sql)
        # Fetch all rows from the result
        articles = cursor.fetchall()

        # Convert data to a list of dictionaries for JSON response
        articles_list = []
        for article in articles:
            article_dict = {
                "id": article[0],
                "title": article[1],
                "description": article[2],
                "source": article[3],
                "url": article[4],
                "image_url": article[5],
                "article_id": article[6],
                "creator": article[7],
                "video_url": article[8],
                "pub_date": article[9],
                "source_id": article[10],
                "source_priority": article[11],
                "source_url": article[12],
                "source_icon": article[13],
                "language": article[14],
                "country": article[15],
                "category": article[17]
            }
            articles_list.append(article_dict)

        return jsonify(articles_list)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/featured', methods=['GET'])
def get_fatured():
    try:
        # SQL query to select data from the database
        sql = "SELECT * FROM tb_beritas WHERE is_featured = 1"
        # Execute the SQL query
        cursor.execute(sql)
        # Fetch all rows from the result
        articles = cursor.fetchall()

        # Convert data to a list of dictionaries for JSON response
        articles_list = []
        for article in articles:
            article_dict = {
                "id": article[0],
                "title": article[1],
                "description": article[2],
                "source": article[3],
                "url": article[4],
                "image_url": article[5],
                "article_id": article[6],
                "creator": article[7],
                "video_url": article[8],
                "pub_date": article[9],
                "source_id": article[10],
                "source_priority": article[11],
                "source_url": article[12],
                "source_icon": article[13],
                "language": article[14],
                "country": article[15],
                "category": article[17]
            }
            articles_list.append(article_dict)

        return jsonify(articles_list)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/articles/<category>', methods=['GET'])
def get_articles_by_category(category):
    try:
        # SQL query to select articles based on the specified category
        sql = "SELECT * FROM tb_beritas WHERE category LIKE %s"
        # Execute the SQL query
        cursor.execute(sql, (category,))
        # Fetch all rows from the result
        category_articles = cursor.fetchall()

        # Convert data to a list of dictionaries for JSON response
        category_articles_list = []
        for article in category_articles:
            article_dict = {
                "id": article[0],
                "title": article[1],
                "description": article[2],
                "source": article[3],
                "url": article[4],
                "image_url": article[5],
                "article_id": article[6],
                "creator": article[7],
                "video_url": article[8],
                "pub_date": article[9],
                "source_id": article[10],
                "source_priority": article[11],
                "source_url": article[12],
                "source_icon": article[13],
                "language": article[14],
                "country": article[15],
                "category": article[17]
            }
            category_articles_list.append(article_dict)

        return jsonify(category_articles_list)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/', methods=['GET'])
def home():
    return "Welcome to the BiNews API!"


if __name__ == '__main__':
    # Start the polling mechanism in a separate thread
    import threading
    polling_thread = threading.Thread(target=start_polling)
    polling_thread.start()
    
    # Run the Flask application
    app.run(debug=True)