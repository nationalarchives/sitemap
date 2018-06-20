import json
from pprint import pprint
import xml.etree.ElementTree as elementtree


def read_sitemap_xml():
    pass
    return [{
        'url': element.find('loc').text,
        'lastmod': element.find('lastmod').text,
        'changefreq': element.find('changefreq').text,
        'priority': element.find('priority').text
    } for element in elementtree.parse('in/sitemap.xml').findall('url')]


def param_split(url_string):
    return url_string.split("?")


def directory_split(url_string):
    return list(filter(None, url_string.split("/")))


def remove_url_beginning(url_string):
    return url_string.replace('http://www.nationalarchives.gov.uk/', '')


def sanitize_url(raw_url):
    param = ''
    new_url = raw_url
    if raw_url != 'http://www.nationalarchives.gov.uk/':
        new_url = remove_url_beginning(raw_url)
    else:
        return {'raw_url': new_url, 'param': param, 'split_url': []}
    if '?' in raw_url:
        param = param_split(raw_url)[-1]
        new_url = "/".join(param_split(raw_url)[:-1])
    return {'raw_url': raw_url, 'split_url': directory_split(new_url), 'param': param}


def longest_url_length(urls_array):
    longest_url = []
    for url in urls_array:
        if len(url['split_url']) > len(longest_url):
            longest_url = url['split_url']
    return len(longest_url)


def sort_urls_by_length(urls_array):
    for i in range(1, longest_url_length(urls_array)):
        urls_of_length = []
        for url in urls_array:
            if len(url['split_url']) == i:
                if url['param'] == '' and i > 1:
                    urls_of_length.append({
                        'name': url['split_url'][-1],
                        'parent': url['split_url'][-2],
                        'url': url['raw_url'],
                        'level': str(i)
                    })
                elif url['param'] == '' and i == 1:
                    urls_of_length.append({
                        'name': url['split_url'][-1],
                        'url': url['raw_url'],
                        'level': str(i)
                    })
                else:
                    urls_of_length.append({
                        'name': url['split_url'][-1],
                        'parent': url['split_url'][-2],
                        'url': url['raw_url'],
                        'level': str(i),
                        'param': url['param']
                    })
        out_file = open('out/url-length-'+str(i)+'.json', 'w')
        json.dump(urls_of_length, out_file)


urls = json.load(open('in/formatted_urls.json', 'r'))
sort_urls_by_length(urls)


