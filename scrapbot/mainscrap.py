import subprocess
import importlib.metadata as metadata
import sys
import os
from dotenv import load_dotenv
# Load environment variables from .env file
load_dotenv()

# Read the requirements from requirements.txt
with open("requirements.txt", "r") as file:
    requirements = [line.strip() for line in file]

installed_packages = [pkg.metadata['Name'] for pkg in metadata.distributions()]

# Check if each requirement is installed
missing_requirements = [requirement for requirement in requirements if requirement not in installed_packages]

# If there are missing requirements, install them
if missing_requirements:
    print("Installing missing requirements...")
    subprocess.call(["pip", "install", *missing_requirements])
    print("Requirements installed successfully.")


# ASCII art of a newspaper
newspaper_art = """ \033[32m 
          _ _,---._ 
       ,-','       `-.___ 
      /-;'               `._ 
     /\/          ._   _,'o \ 
    ( /\       _,--'\,','"`. ) 
     |\      ,'o     \'    //\ 
     |      \        /   ,--'""`-. 
     :       \_    _/ ,-'         `-._ 
      \        `--'  /                ) 
       `.  \`._    ,'     ________,',' 
         .--`     ,'  ,--` __\___,;' 
          \`.,-- ,' ,`_)--'  /`.,' 
           \( ;  | | )      (`-/ 
             `--'| |)       |-/ 
               | | |        | | 
               | | |,.,-.   | |_ 
               | `./ /   )---`  ) 
              _|  /    ,',   ,-' 
             ,'|_(    /-<._,' |--, 
             |    `--'---.     \/ \ 
             |          / \    /\  \ 
           ,-^---._     |  \  /  \  \ 
        ,-'        \----'   \/    \--`. 
       /            \              \   \ 
  _________                            __________        __   
 /   _____/ ________________  ______   \______   \ _____/  |__ 
 \_____  \_/ ___\_  __ \__  \ \____ \   |    |  _//  _ \   __/
 /        \  \___|  | \// __ \|  |_> >  |    |   (  <_> )  |  
/_______  /\___  >__|  (____  /   __/   |______  /\____/|__|  
        \/     \/           \/|__|             \/             
\033[0m"""

print(newspaper_art)

import requests
import mysql.connector

def scrape_news(api_key, countries, language, categories):
    url = f"https://newsdata.io/api/1/news?apikey={api_key}&country={countries}&language={language}&category={categories}"
    
    DB_HOST = os.getenv("DB_HOST")
    DB_USER = os.getenv("DB_USER")
    DB_PASSWORD = os.getenv("DB_PASSWORD")
    DB_NAME = os.getenv("DB_NAME")
    # Fetch the JSON data
    response = requests.get(url)
    
    if response.status_code == 200:
        data = response.json()
        
        # Establish a connection to MySQL database
        db_connection = mysql.connector.connect(
            host=DB_HOST,
            user=DB_USER,
            password=DB_PASSWORD,
            database=DB_NAME
        )
        
        # Create a cursor object to interact with the database
        cursor = db_connection.cursor()

        # Extract relevant information from the JSON response
        articles = data.get('results', [])
        
        for article in articles:
            title = article.get('title', 'N/A')
            description = article.get('description', 'N/A')
            source = article.get('source', {}).get('name', 'N/A')
            url = article.get('link', '#')
            image_url = article.get('image_url', '#')
            article_id = article.get('article_id', 'N/A') 
            creator = article.get('creator') or 'bot_scrap'
            video_url = article.get('video_url', 'N/A')
            pub_date = article.get('pubDate', 'N/A')
            source_id = article.get('source_id', 'N/A')
            source_priority = article.get('source_priority', 'N/A')
            source_url = article.get('source_url', 'N/A')
            source_icon = article.get('source_icon', 'N/A')
            langs = article.get('language', 'N/A')
            country = article.get('country', ['N/A'])
            category = article.get('category', ['N/A'])
            
            # SQL query to insert data into the database
            
            sql = "INSERT INTO tb_beritas (title, description, source, url, image_url, article_id, creator, video_url, pub_date, source_id, source_priority, source_url, source_icon, language, country, category) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
            
            # Print values before executing SQL query
            print("Values to insert into the database:")
            print("Title:", title)
            print("Description:", description)
            print("Source:", source)
            print("URL:", url)
            print("Image URL:", image_url)
            print("Article ID:", article_id)
            print("Creator:", creator)
            print("Video URL:", video_url)
            print("Pub Date:", pub_date)
            print("Source ID:", source_id)
            print("Source Priority:", source_priority)
            print("Source URL:", source_url)
            print("Source Icon:", source_icon)
            print("Language:", langs)
            print("Country:", country)
            print("Category:", category)
            try:
                # Execute the SQL query
                cursor.execute(sql, (title, description, source, url, image_url, article_id, creator, video_url, pub_date, source_id, source_priority, source_url, source_icon, langs, ', '.join(country), ', '.join(category)))
                # Commit changes to the database
                db_connection.commit()
                print("Data successfully inserted into the database.")
            except Exception as e:
                # Rollback changes in case of error
                db_connection.rollback()
                print("Failed to insert data into the database:", str(e))
        
        else:
            print("Failed to fetch data")

# Replace these values with your own API key and preferences
api_key = "pub_446740eea945275a46b2cc5dd91e73f6739a1"
countries = "id"
language = "id"

# Categories dictionary with numbers as keys
categories = {
    '1': 'Business',
    '2': 'Crime',
    '3': 'Domestic',
    '4': 'Education',
    '5': 'Environment',
    '6': 'Food',
    '7': 'Health',
    '8': 'Lifestyle',
    '9': 'Other',
    '10': 'Politics',
    '11': 'Science',
    '12': 'Sports',
    '13': 'Entertainment',
    '14': 'Technology',
    '15': 'Top',
    '16': 'World',
    '17': 'Tourism'
}

# Print category options
print("Select categories by entering numbers separated by commas:")
for num, cat in categories.items():
    print(f"{num}. {cat}")

# Ask user to select categories
selected_categories_input = input("Enter the numbers of the categories you want to view (separated by commas): ")

# Split input into individual category numbers
selected_categories = [categories[num.strip()].lower() for num in selected_categories_input.split(',') if num.strip() in categories]

# Fetch news for selected categories and insert into the database
for category in selected_categories:
    scrape_news(api_key, countries, language, category)
