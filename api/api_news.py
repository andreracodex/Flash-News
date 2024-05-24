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
                "Title": article[0],
                "Description": article[1],
                "Source": article[2],
                "URL": article[3],
                "Image URL": article[4],
                "Article ID": article[5],
                "Creator": article[6],
                "Video URL": article[7],
                "Pub Date": article[8],
                "Source ID": article[9],
                "Source Priority": article[10],
                "Source URL": article[11],
                "Source Icon": article[12],
                "Language": article[13],
                "Country": article[14],
                "Category": article[15]
            }
            articles_list.append(article_dict)

        return jsonify(articles_list)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/articles/technology', methods=['GET'])
def get_technology_articles():
    try:
        # SQL query to select technology articles from the database
        sql = "SELECT * FROM tb_beritas WHERE category = 'technology'"
        # Execute the SQL query
        cursor.execute(sql)
        # Fetch all rows from the result
        technology_articles = cursor.fetchall()

        # Convert data to a list of dictionaries for JSON response
        technology_articles_list = []
        for article in technology_articles:
            article_dict = {
                "Title": article[0],
                "Description": article[1],
                "Source": article[2],
                "URL": article[3],
                "Image URL": article[4],
                "Article ID": article[5],
                "Creator": article[6],
                "Video URL": article[7],
                "Pub Date": article[8],
                "Source ID": article[9],
                "Source Priority": article[10],
                "Source URL": article[11],
                "Source Icon": article[12],
                "Language": article[13],
                "Country": article[14],
                "Category": article[15]
            }
            technology_articles_list.append(article_dict)

        return jsonify(technology_articles_list)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

@app.route('/', methods=['GET'])
def home():
    return "Welcome to the BiNews API!"

if __name__ == '__main__':
    app.run(debug=True)