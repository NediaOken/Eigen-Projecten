function test()
{
	if( vakjes['1B'] == 'b')
	{
		vakjes['1A']++
	}

	if( vakjes['1D'] == 'b')
	{
		vakjes['1A']++
	}

	if( vakjes['1E'] == 'b')
	{
		vakjes['1A']++
	}

	return vakjes['1A']
}

export { test }

