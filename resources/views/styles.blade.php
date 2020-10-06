@extends('layouts.app')

@section('content')

    @markdown
    # Title (Heading 1)

    ## Heading 2

    ### Heading 3

    #### Heading 4

    ##### Heading 5

    ###### Heading 6

    [Link](/)

    ### Lists
    1. Numbered list 1
    2. Numbered list 2
        1. Numbered list indented 1
        2. Numbered list indented 2
    3. Numbered list 3

    - Bullet list 1
    - Bullet list 2
        - Bullet list intended 1
        - Bullet list intended 2
    - Bullet list 3

    ### Footnotes

    Normal footnote[^1]. Labeled Footnote[^labeled].

    ### Paragraph test

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse hendrerit elit a massa euismod, a finibus ligula ultrices. Vestibulum a arcu dignissim, tincidunt magna aliquet, varius augue. Quisque varius neque ante, at aliquet libero ornare at. Curabitur fringilla fermentum dolor vel efficitur. Nullam et consectetur felis, vehicula vehicula erat. Maecenas et porttitor mi. Sed vel nulla quis magna consectetur bibendum nec et turpis. Quisque tortor augue, rutrum sed porta non, lacinia vel dolor. Curabitur eu tortor tincidunt, feugiat mi eu, vulputate mi. Morbi congue leo et malesuada placerat. Quisque sollicitudin nulla vitae nisi volutpat, sed viverra nisi imperdiet.

    Sed sed mi fermentum, sodales dolor et, hendrerit urna. Mauris sit amet sollicitudin turpis. Nam at porttitor ligula, eget iaculis diam. Mauris ullamcorper erat a nibh congue consequat. Morbi elementum velit non sagittis iaculis. Phasellus commodo a turpis sit amet venenatis. Quisque sollicitudin sem metus, vitae dignissim est accumsan eget. Sed dictum auctor laoreet. Pellentesque molestie luctus massa, id semper est condimentum sed. Donec nec nisl auctor, iaculis diam ac, molestie urna. Quisque facilisis odio quis erat convallis luctus. Curabitur augue dolor, sodales vitae volutpat a, posuere vel quam. In hac habitasse platea dictumst. In hac habitasse platea dictumst. Donec ac magna a velit malesuada dignissim. Cras a scelerisque metus.

    Fusce faucibus diam eget viverra ultricies. Nullam bibendum in dui sit amet viverra. Vestibulum magna mauris, interdum fringilla ullamcorper ut, varius nec mauris. Duis a lectus fermentum sapien pharetra commodo eu eget purus. In accumsan porta massa, nec convallis ipsum pharetra sed. Cras convallis libero eu velit accumsan gravida. Nunc venenatis metus dui, et placerat leo pharetra in. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam convallis orci ut quam eleifend, ac fermentum odio pharetra. Donec hendrerit felis sapien. Ut pretium, ex vel feugiat mollis, purus lacus faucibus metus, id consectetur nunc neque sed mi.

    [^1]: Normal Footnote
    [^labeled]: Labeled footnote
    @endmarkdown

@endsection
