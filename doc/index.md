DOCUMENTATION
=============

Search photos
---

```php
// Create the API provider.
$provider = new APIProvider();
$provider->setAuthorization("YOUR API KEY");

// Create a Search photos model.
$request = new SearchPhotosRequest();
$request->setQuery("YOUR QUERY");

// Call the API and get the response.
$response = $provider->searchPhotos($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

$response->getPerPage();
$response->getPage();
$response->getTotalResults();

$response->getPrevPage();
$response->getNextPage();

$response->getUrl();

/** @var Photo $current */
foreach($response->getPhotos() as $current) {

    $current->getId();
    $current->getWidth();
    $current->getHeight();
    $current->getUrl();
    
    $current->getPhotographer();
    $current->getPhotographerUrl();
    
    /** @var Source src */
    $src = $current->getSrc();
    $src->getOriginal();
    $src->getLarge2x();
    $src->getLarge();
    $src->getMedium();
    $src->getSmall();
    $src->getPortrait();
    $src->getLandscape();
    $src->getTiny();
}
```

Curated photos
---

```php
// Create the API provider.
$provider = new APIProvider();
$provider->setAuthorization("YOUR API KEY");

// Create a Curated photo model.
$request = new CuratedPhotosRequest();

// Call the API and get the response.
$response = $provider->curatedPhotos($request);

// Handle the response (same as s//earch photos).
// ...
```

Get a photo
---

```php
// Create the API provider.
$provider = new APIProvider();
$provider->setAuthorization("YOUR API KEY");

// Create a Get photo model.
$request = new GetPhotoRequest();
$request->setId(1234);

// Call the API and get the response.
$response = $provider->getPhoto($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

/** @var Photo $photo */
$photo = $response->getPhoto();
```

Search videos
---

```php
// Create the API provider.
$provider = new APIProvider();
$provider->setAuthorization("YOUR API KEY");

// Create a Search videos model.
$request = new SearchVideosRequest();
$request->setQuery("YOUR QUERY");

// Call the API and get the response.
$response = $provider->searchVideos($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

$response->getPerPage();
$response->getPage();
$response->getTotalResults();

$response->getPrevPage();
$response->getNextPage();

$response->getUrl();

/** @var Video $current */
foreach($response->getVideos() as $current) {
    
    $current->getId();
    $current->getWidth();
    $current->getHeight();
    $current->getUrl();
    
    $current->getImage();
    $current->getFullRes();
    $current->getDuration();
    
    /** @var VideoFile[] $videoFiles */
    $videoFiles = $current->getVideosFiles();
    foreach($videoFiles as $vf) {
    
        $vf->getId();
        $vf->getQuality();
        $vf->getFileType();
        $vf->getWidth();
        $vf->getHeight();
        $vf->getLink();
    }

    /** @var VideoPicture[] $videoPictures */
    $videoPictures = $current->getVideosPictures();
    foreach($videoPictures as $vp) {
    
        $vp->getId();
        $vp->getPicture();
        $vp->getNr();
    }
}
```

Popular videos
---

```php
// Create the API provider.
$provider = new APIProvider();
$provider->setAuthorization("YOUR API KEY");

// Create a Popular videos model.
$request = new PopularVideosRequest();

// Call the API and get the response.
$response = $provider->popularVideos($request);

// Handle the response (same as search videos).
// ...
```

Get a video
---

```php
// Create the API provider.
$provider = new APIProvider();
$provider->setAuthorization("YOUR API KEY");

// Create a Get video model.
$request = new GetVideoRequest();
$request->setId(1234);

// Call the API and get the response.
$response = $provider->getVideo($request);

// Handle the response.
$response->getLimit();
$response->getRemaining();
$response->getReset();

/** @var Video $video */
$video = $response->getVideo();
```