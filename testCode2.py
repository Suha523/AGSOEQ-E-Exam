import nltk
from nltk import word_tokenize, pos_tag
from nltk.corpus import wordnet as wn
import re
import string
import inflect
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from collections import Counter
from string import punctuation
from sklearn.feature_extraction.text import ENGLISH_STOP_WORDS as stop_words
#import sklearn.feature_extraction.text.ENGLISH_STOP_WORDS as stop_words
import mysql.connector
import math as math
from datetime import datetime
from datetime import date
from mysql.connector import Error
# nltk.download()
# connect database
mydb=mysql.connector.connect(host='localhost',port=3308,user='root',passwd='',database='examinate')
# extractive summarization:

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


p = inflect.engine()
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

def filtered_words(textToken):
    stop_words = stopwords.words('english')
    filteredwords = [word for word in textToken if word not in stop_words]
    return filteredwords


def penn_to_wn(tag):
    """ Convert between a Penn Treebank tag to a simplified Wordnet tag """
    if tag.startswith('N'):
        return 'n'

    if tag.startswith('V'):
        return 'v'

    if tag.startswith('J'):
        return 'a'

    if tag.startswith('R'):
        return 'r'

    return None

def tagged_to_synset(word, tag):
    wn_tag = penn_to_wn(tag)
    if wn_tag is None:
        return None

    try:
        return wn.synsets(word, wn_tag)[0]
    except:
        return None


# def sent_counter(sents):
#     sent_count=0
#     for sent in sents:
#         sent_count+=1
#     return sent_count


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

def sim1(sentence1,sentence2):
    """ compute the sentence similarity using Wordnet """
    # convert number,clean_text and
    sentence1 = deEmojify(clean_text(convert_number(sentence1)))
    sentence2 = deEmojify(clean_text(convert_number(sentence2)))
    # print(sentence1)
    # Tokenize and tag
    sentence1 = pos_tag(filtered_words(word_tokenize(sentence1)))
    sentence2 = pos_tag(filtered_words(word_tokenize(sentence2)))

    # Get the synsets for the tagged words
    synsets1 = [tagged_to_synset(*tagged_word) for tagged_word in sentence1]
    synsets2 = [tagged_to_synset(*tagged_word) for tagged_word in sentence2]
    # print(synsets1)
    # print(synsets2)
    # Filter out the Nones
    synsets1 = [ss for ss in synsets1 if ss]
    synsets2 = [ss for ss in synsets2 if ss]
    print(synsets1)
    print(synsets2)
    score, count = 0.0, 0

    # For each word in the first sentence
    for synset in synsets1:
        # Get the similarity value of the most similar word in the other sentence
        # Wu - Palmer Similarity: Return a score denoting how similar two word senses are, based on the depth
        # of the two senses in the taxonomy and that of their Least Common Subsumer(most specific ancestor node).Note that
        # at this time the scores given do _not_ always agree
        # with those given by Pedersen's Perl implementation of Wordnet Similarity.

        x1 = [synset.wup_similarity(ss) for ss in synsets2]
        print(x1)
        x2 = [0]
        for i in x1:
            if i is not None:
                x2.append(i)
        best_score = max(x2)
        # Check that the similarity could have been computed
        if best_score is not None:
            score += best_score
            count += 1
    # Average the values
    score /= count
    return score

def sim2(sentence1,sentence2):
    """ compute the sentence similarity using Wordnet """
    # convert number,clean_text and
    sentence1 = deEmojify(clean_text(convert_number(sentence1)))
    sentence2 = deEmojify(clean_text(convert_number(sentence2)))
    # print(sentence1)
    # Tokenize and tag
    sentence1 = pos_tag(filtered_words(word_tokenize(sentence1)))
    sentence2 = pos_tag(filtered_words(word_tokenize(sentence2)))

    # Get the synsets for the tagged words
    synsets1 = [tagged_to_synset(*tagged_word) for tagged_word in sentence1]
    synsets2 = [tagged_to_synset(*tagged_word) for tagged_word in sentence2]
    # print(synsets1)
    # print(synsets2)
    # Filter out the Nones
    synsets1 = [ss for ss in synsets1 if ss]
    synsets2 = [ss for ss in synsets2 if ss]
    print(synsets1)
    print(synsets2)
    score, count = 0.0, 0

    # For each word in the first sentence
    for synset in synsets1:
        # Get the similarity value of the most similar word in the other sentence
        ''' Return a score denoting how similar two word senses are, based on the shortest path that connects 
        the senses in the is-a (hypernym/hypnoym) taxonomy. The score is in the range 0 to 1. By default, there is now 
        a fake root node added to verbs so for cases where previously a path could not be found---and None was returned---it should return 
        a value. The old behavior can be achieved by setting simulate_root to be False.
         A score of 1 represents identity i.e. comparing a sense with itself will return 1.
        '''
        x1 = [synset.path_similarity(ss) for ss in synsets2]
        print(x1)
        x2 = [0]
        for i in x1:
            if i is not None:
                x2.append(i)
        best_score = max(x2)
        # Check that the similarity could have been computed
        if best_score is not None:
            score += best_score
            count += 1
    # Average the values
    score /= count
    return score

def sentence_similarity(sentence1, sentence2):
    score=max(sim1(sentence1,sentence2),sim2(sentence1,sentence2))
    return score

# def find_top_n(text):
#     sents = sent_tokenizer(text)
#     sent_counter=0
#     for sent in sents:
#         sent_counter+=1
#     return sent_counter




mycursor=mydb.cursor()


# now = datetime.now()
# current_time = now.strftime("%H:%M:%S")
# today = date.today()
# current_day = today.strftime("%Y-%M-%D")
sl='select * from exam where flag =0'
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
        mycursor.execute('select * from stuanswer where qId='+qid.__str__())
        stuanswers = mycursor.fetchall()
        for j in stuanswers:
            text2 = j[3]
            sid = int(j[0])
            eid = int(j[2])
            if (j[4] == None):
                if(j[3]==None):
                    mark=0
                else:
                    qmark = i[3]
                    s2=sentence_summarization(text2)
                    x=sentence_similarity(text1,text2)
                    m=x*float(qmark)
                    mark=round(m,1)
                    print(mark)
                    b=mark-int(mark)
                    if b>0.5 and b<=0.9:
                        mark=math.ceil(mark)
                    elif b<0.5 and b>=0.1:
                        mark=math.floor(mark)
                try:
                        # Execute the SQL commands
                        updatemarksql = 'update stuanswer set qMark=' + mark.__str__() + ' where stuId=' + sid.__str__() + ' and qId=' + qid.__str__() + ' and eId=' + eid.__str__()
                        mycursor.execute(updatemarksql)

                        # Commit your changes in the database
                        mydb.commit()
                except:
                        # Rollback in case there is any error
                        mydb.rollback()

        mycursor.execute('select * from stuanswer')

        # Displaying the result
        print(mycursor.fetchall())

    stusql='select eId,stuId,sum(qMark) from(select * from  stuanswer  where eId= '+int(exam[0]).__str__()+' )as stu group by stuId '

    mycursor.execute(stusql)
    d=mycursor.fetchall()


    for t in d:
         if flag==0:
            insertmarksql='insert into mark values('+int(t[0]).__str__()+','+int(t[1]).__str__()+','+int(t[2]).__str__()+')'
            mycursor.execute(insertmarksql)
            mydb.commit()
            esql = 'update exam set flag=1 where eId=' +int(t[0]).__str__()
            mycursor.execute(esql)
            mydb.commit()


mycursor.execute('select * from mark')
print(mycursor.fetchall())
mydb.close()