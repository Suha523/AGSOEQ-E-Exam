
import string
import nltk
import inflect
p = inflect.engine()
from collections import Counter
from sklearn.feature_extraction.stop_words import ENGLISH_STOP_WORDS as stop_words

from string import punctuation

import re
# nltk.download()
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from nltk.stem.porter import PorterStemmer
from nltk import pos_tag
from nltk.stem import WordNetLemmatizer
from nltk.corpus import wordnet
import math
import numpy
import gensim
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
import numpy as np
import numpy.linalg as LA
import pandas as pd
from datetime import datetime
from datetime import date
import  mysql.connector

mydb=mysql.connector.connect(host='localhost',user='root',passwd='',database='examination')

def sent_tokenizer(s):
    sents = []
    for sent in s.split('.'):
        sents.append(sent.strip())
    return sents


def count_words(tokens):
    word_counts = {}
    for token in tokens:
        if token not in stop_words and token not in punctuation:
            if token not in word_counts.keys():
                word_counts[token] = 1
            else:
                word_counts[token] += 1
    return word_counts

# word_counts


def word_freq_distribution(word_counts):
    freq_dist = {}
    max_freq = max(word_counts.values())
    for word in word_counts.keys():
        freq_dist[word] = (word_counts[word]/max_freq)
    return freq_dist


# freq_dist

def score_sentences(sents, freq_dist, max_len=40):
    sent_scores = {}
    for sent in sents:
        words = sent.split(' ')
        for word in words:
            if word.lower() in freq_dist.keys():
                if len(words) < max_len:
                    if sent not in sent_scores.keys():
                        sent_scores[sent] = freq_dist[word.lower()]
                    else:
                        sent_scores[sent] += freq_dist[word.lower()]
    return sent_scores


# sent_scores

def summarize(sent_scores, k):
    top_sents = Counter(sent_scores)
    summary = ''
    scores = []

    top = top_sents.most_common(k)
    for t in top:
        summary += t[0].strip() + '. '
        scores.append((t[1], t[0]))
    return summary[:-1], scores

def sentence_summarization(texts)  :
    sents = sent_tokenizer(texts)
    tokens = word_tokenize(texts)
    word_counts = count_words(tokens)
    freq_dist = word_freq_distribution(word_counts)
    sent_scores = score_sentences(sents, freq_dist)
    # sent_count=sent_counter(sents)
    # top_n=sent_count
    summary , summary_sent_scores = summarize(sent_scores,1)
    print(summary)
    return summary



def convert_number(text):
    # split string into list of words, initialise empty list
    temp_str = text.split()
    new_string = []
    for word in temp_str:
        # if word is a digit, convert the digit
        # to numbers and append into the new_string list
        if word.isdigit():
            temp = p.number_to_words(word)
            new_string.append(temp)
        # append the word as it is
        else:
            new_string.append(word)
    # join the words of new_string to form a string
    temp_str = ' '.join(new_string)
    return temp_str
def clean_text(essay):
    essay=str(essay)
    result = re.sub(r'http[^\s]*', '',essay)
    result = re.sub('[0-9]+','', result).lower()
    result = re.sub('@[a-z0-9]+', '', result)
    return re.sub('[%s]*' % string.punctuation, '',result)
def deEmojify(essay):
    return essay.encode('ascii', 'ignore').decode('ascii')
def tokenize(essay):
    return word_tokenize(essay)
def filtered_words(textToken):
    stop_words = stopwords.words('english')
    filteredwords = [word for word in textToken if word not in stop_words]
    return filteredwords

def lemmatizer(text):
    lemmatizer = WordNetLemmatizer()
    lemmatized=[lemmatizer.lemmatize(word,pos="a")for word in text]
    return lemmatized

def lemmas(tokenized_sentences):
    lemmas = []
    wordnet_lemmatizer = WordNetLemmatizer()
    tagged_tokens = nltk.pos_tag(tokenized_sentences)
    for token_tuple in tagged_tokens:
            pos_tag = token_tuple[1]
            if pos_tag.startswith('N'):
                pos = wordnet.NOUN
                lemmas.append(wordnet_lemmatizer.lemmatize(token_tuple[0], pos))
            elif pos_tag.startswith('J'):
                pos = wordnet.ADJ
                lemmas.append(wordnet_lemmatizer.lemmatize(token_tuple[0], pos))
            elif pos_tag.startswith('V'):
                pos = wordnet.VERB
                lemmas.append(wordnet_lemmatizer.lemmatize(token_tuple[0], pos))
            elif pos_tag.startswith('R'):
                pos = wordnet.ADV
                lemmas.append(wordnet_lemmatizer.lemmatize(token_tuple[0], pos))
            else:
                pos = wordnet.NOUN
                lemmas.append(wordnet_lemmatizer.lemmatize(token_tuple[0], pos))
    return lemmas

def cleanText(text):
    textNum = convert_number(text)
    textClean = clean_text(textNum)
    textCC = deEmojify(textClean)
    textToken = tokenize(textCC)
    textF = filtered_words(textToken)
    textPOSAlem = lemmas(textF)
    return textPOSAlem


# def listToString(s):
#     str1 = ""
#     for ele in s:
#         str1 += " "+ele
#     return str1

def cosine(v1, v2):
    v1 = np.array(v1)
    v2 = np.array(v2)
    return np.dot(v1, v2) / (np.sqrt(np.sum(v1**2)) * np.sqrt(np.sum(v2**2)))

# create a dictionary contains the word as a key and the count as a value
def createDict(text):
    wordDict = dict.fromkeys(total, 0)
    for word in text:
        wordDict[word]+=1
    pd.DataFrame([wordDict])
    return wordDict

# calculate the term frequency distribution
def computeTF(wordDict, doc):
    tfDict = {}
    corpusCount = len(doc)
    for word, count in wordDict.items():
        tfDict[word] = count/float(corpusCount)
    return(tfDict)

# calculate the idf:
def computeIDF(docList):
    print(docList)
    N = len(docList)
    idfDict= dict.fromkeys(docList[0].keys(), 0)
    for word, val in idfDict.items():
        idfDict[word] = math.log10(N/ float(val+1) )
    return idfDict


def computeTFIDF(tfBow, idfs):
    tfidf = {}
    for word, val in tfBow.items():
        tfidf[word] = val*idfs[word]
    return(tfidf)

mycursor=mydb.cursor()


now = datetime.now()
current_time = now.strftime("%H:%M:%S")
today = date.today()
current_day = today.strftime("%Y-%M-%D")
sl='select * from exam where date< CURDATE() and flag =0'
mycursor.execute(sl)
exams=mycursor.fetchall()

for exam in exams:
    flag=int(exam[8])
    s='select * from question where eId='+int(exam[0]).__str__()
    mycursor.execute(s)
    questions = mycursor.fetchall()
    for i in questions:
        qid = int(i[0])
        text1 = i[2]
        s1=sentence_summarization(text1)
        preprocessedText1 = cleanText(s1)
        sqlq='select * from stuanswer where qId=' + qid.__str__()
        mycursor.execute(sqlq)
        stuanswers = mycursor.fetchall()
        for j in stuanswers:
            text2 = j[3]
            sid = int(j[0])
            eid=int(j[2])
            if (j[4] == None):
                if (j[3] == None):
                    mark = 0
                else:
                    qmark = i[3]
                    s2=sentence_summarization(text2)
                    preprocessedText2 = cleanText(s2)
                    total = set(preprocessedText1).union(set(preprocessedText2))
                    tfFirst = computeTF(createDict(preprocessedText1), preprocessedText1)
                    tfSecond = computeTF(createDict(preprocessedText2), preprocessedText2)
                    tf = pd.DataFrame([tfFirst, tfSecond])
                    idfs = computeIDF([createDict(preprocessedText1), createDict(preprocessedText2)])
                    idfFirst = computeTFIDF(tfFirst, idfs)
                    idfSecond = computeTFIDF(tfSecond, idfs)
                    idf = pd.DataFrame([idfFirst, idfSecond])
                    v1 = []
                    for x in idfFirst:
                        v1.append(idfFirst[x])
                    v2 = []
                    for x in idfSecond:
                        v2.append(idfSecond[x])
                    sim = cosine(v1, v2)
                    m = sim * float(qmark)
                    mark = round(m, 1)
                    print(sim,'    ',mark,'   ',qmark)
                    b = mark - int(mark)
                    if b > 0.5 and b <= 0.9:
                        mark = math.ceil(mark)
                    elif b < 0.5 and b >= 0.1:
                        mark = math.floor(mark)
                try:
                    # Execute the SQL commands
                    updatemarksql = 'update stuanswer set qMark=' + mark.__str__() + ' where stuId=' + sid.__str__()+' and qId='+qid.__str__()+ ' and eId='+eid.__str__()

                    mycursor.execute(updatemarksql)

                    # Commit your changes in the database
                    mydb.commit()
                except:
                    # Rollback in case there is any error
                    mydb.rollback()

        mycursor.execute('select * from stuanswer')

        # Displaying the result
        print(mycursor.fetchall())

    stusql = 'select eId,stuId,sum(qMark) from(select * from  stuanswer  where eId= ' + int(
        exam[0]).__str__() + ' )as stu group by stuId '

    mycursor.execute(stusql)
    d = mycursor.fetchall()

    for t in d:
        if flag == 0:
            insertmarksql = 'insert into mark values(' + int(t[0]).__str__() + ',' + int(t[1]).__str__() + ',' + int(
                t[2]).__str__() + ')'
            mycursor.execute(insertmarksql)
            mydb.commit()
            esql = 'update exam set flag=1 where eId=' + int(t[0]).__str__()
            mycursor.execute(esql)
            mydb.commit()
mycursor.execute('select * from mark')
print(mycursor.fetchall())
mydb.close()

