Assignment 1 by Brennan Giles

Operation:

	python bloom.py -d dictionaryname.txt -i inputname.txt -o outputnameforthreehash.txt outputnameforfivehash.txt

Questions:

	a)
	I am using md5, sha256, sha1, sha384, and sha512. md5 and the sha family of hash functions are all cryptographic hash functions,
	although md5 and sha1 are considered broken. I choose each because while i was looking at the hashlib library these were simply 
	the first that popped out to me.

	output ranges:
	md5 - 128 bits
	sha1 - 160
	sha256 - 256
	sha384 - 384
	sha512 - 512

	I made my bloom filter indexes 4 million spaces large.

	b)
	Bloom filter was indexed after 12.6326568127 seconds
	Time to check using each hash:

	sha256: 12.6368448734 	+ 0.0041880607
	md5: 12.6368768215 	+ 0.0000319481
	sha1: 12.6368918419 	+ 0.0000150204
	sha384: 12.648873806 	+ 0.0119819641
	sha512: 12.6489019394 	+ 0.0000281334

	It looks like the more in depth hashes that result in bigger outputs take longer, except for sha512 which for some reason is the second
	fastest method involved!

	c) 
	      1- (1 - 1/N) ^ kB ) k

	where N is output width, B is dictionary size (623518), k is hash functions involved
	false negative is 0% 
	false positive, where first is 3 hash and second is 5 hash:

	 .05211, .04647
	

	d) increase k or b, decrease n

		