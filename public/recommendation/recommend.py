#Fashion(cloth) recomendation system based on content based filtering

#Importing necessary libraries
import sys
input=sys.argv[1]
import pandas as pd
import numpy as np

#Importing dataset
fashion_df = pd.read_csv("wedMadeSimple.csv")
fashion_df.head()

#Dropping year, usage, baseColour column
fashion_df2 = fashion_df.drop(columns=['year', 'usage', 'baseColour'])
fashion_df2.head()

#Importing TfidfVectorizer for vector representation
from sklearn.feature_extraction.text import TfidfVectorizer
document_matrix = TfidfVectorizer(
    analyzer='word', 
    strip_accents='unicode', 
    token_pattern=r'\w{1,}',
    ngram_range=(1,3),
    stop_words = 'english')

#Replacing nan value with empty string
fashion_df2['productDisplayName'] = fashion_df2['productDisplayName'].fillna('')
#Applying fit_transform method and converting into sparse matrix
document_term_matrix = document_matrix.fit_transform(fashion_df2['productDisplayName'])

#Importing cosine_similarity
from sklearn.metrics.pairwise import cosine_similarity
calculate_similarity = cosine_similarity(document_term_matrix,document_term_matrix)

#show all the productDisplayName with its respective indices
indices_name = pd.Series(fashion_df2.index, index=fashion_df2['productDisplayName'])

#show all the subCategory
name = fashion_df2['productDisplayName']
#store unique productDisplayName
unique_name = []
#this list store the name that are repeated
repeating_name = []
#Loop for finding and appending unique and repeating productDisplayName
for i in range(len(name)):
    if name[i] not in unique_name:
        unique_name.append(name[i])
    elif name[i] not in repeating_name:
        repeating_name.append(name[i])

#This method get executed only when the user enter product display name that are repeated in dataset
def choose_indice(productDisplayName):
    #show all the indices of the entered productDisplayName
    product_names = indices_name[productDisplayName]
    #store all the indices of the entered productDisplayName
    name_indices = []
    #Loop for storing all the indices of the entered product display name
    for i in range(len(product_names)):
        name_indices.append(product_names[i])
    return  name_indices[0]

def get_top10_recommendation(productDisplayName, calculate_similarity=calculate_similarity):
    #If the user enter incorrect productDisplay Name then it returns error message
    if productDisplayName not in unique_name:
        return ("Error, Please enter correct product display name")    
    else:
        if productDisplayName in repeating_name:
            value = choose_indice(productDisplayName)
            #obtain similarity scores
            final_cosine_scores = list(enumerate(calculate_similarity[value]))
            #sort the obtained similarity scores in descending fashion
            final_cosine_scores = sorted(final_cosine_scores, key=lambda x:x[1], reverse=True)
            #retrieve top-ten scores
            final_cosine_scores = final_cosine_scores[1:4]
            data_indices = [i[0] for i in final_cosine_scores]
            result_final = list(enumerate(fashion_df2['productDisplayName'].iloc[data_indices]))
            value = ""
            for i in result_final:
                value = value + i[1] + ',' 
            return value
        else:
            #obtain similarity scores
            final_cosine_scores = list(enumerate(calculate_similarity[indices_name[productDisplayName]]))
            #sort the obtained similarity scores in descending fashion
            final_cosine_scores = sorted(final_cosine_scores, key=lambda x:x[1], reverse=True)
            #retrieve top-ten scores
            final_cosine_scores = final_cosine_scores[1:4]
            data_indices = [i[0] for i in final_cosine_scores]
            result_final = list(enumerate(fashion_df2['productDisplayName'].iloc[data_indices]))
            value = ""
            for i in result_final:
                value = value + i[1] + ',' 
            return value
            
print (get_top10_recommendation(input))

