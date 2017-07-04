import os
import sys
import numpy as np
import random
import PIL
from PIL import ImageFont
from PIL import Image
from PIL import ImageDraw
import operator
import math
import shutil




def place(image, text):
	l,w=image.size

	
	img=Image.new("RGBA",(l,w))
	draw = ImageDraw.Draw(img)

	beg=random.randint(int(l/12),int(l/8))
	x=np.arange(beg,l-beg,int((l-2*beg)/len(text)))
	bb=random.randint(int(w/12),int(w/8))
	y=np.arange(bb,w-bb,int((w-2*bb)/len(text)))
	font = ImageFont.truetype("C:/wamp/www/iitrpr-net-banking/textplacement/fonts/abyssinica/AbyssinicaSIL-R.ttf",int((w-2*bb)/len(text)))
	for i in range(len(text)):
		draw.text((x[i],y[i]),text[i],(0,0,0),font=font)

	image.paste(img,(0,0),mask=img)
	return image














def __main__():
	ipath="C:/wamp/www/iitrpr-net-banking/textplacement/reg_images"
	opath="C:/wamp/www/iitrpr-net-banking/textplacement/soutputs"
	for file in os.listdir(opath):
                        file_path=os.path.join(opath,file)
                        try:
                                if os.path.isfile(file_path):
                                                os.unlink(file_path)
                        except Exception as e:
                                print e
	text=sys.argv[1]
	img=[]
	img.append(sys.argv[2])
	img.append(sys.argv[3])
	img.append(sys.argv[4])
	img.append(sys.argv[5])
	img.append(sys.argv[6])
	img.append(sys.argv[7])

	for i in range(len(img)):
                f=Image.open(ipath+"/"+str(img[i]))
		a=place(f,text)
		a=a.resize((600,600),Image.ANTIALIAS)
		a.save(opath+"/"+str(i)+'.jpg')

__main__()
